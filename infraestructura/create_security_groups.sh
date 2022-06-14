#!/bin/bash
set -x

# Deshabilitamos la paginación de la salida de los comandos de AWS CLI
# Referencia: https://docs.aws.amazon.com/es_es/cli/latest/userguide/cliv2-migration.html#cliv2-migration-output-pager
export AWS_PAGER=""

# Creamos el grupo de seguridad para gaminder
aws ec2 create-security-group \
    --group-name gaminder-sg \
    --description "Reglas para el frontend"

# Creamos una regla de acceso SSH
aws ec2 authorize-security-group-ingress \
    --group-name gaminder-sg \
    --protocol tcp \
    --port 22 \
    --cidr 0.0.0.0/0

# Creamous una regla de acceso HTTP
aws ec2 authorize-security-group-ingress \
    --group-name gaminder-sg \
    --protocol tcp \
    --port 80 \
    --cidr 0.0.0.0/0

# Creamos una regla de acceso HTTPS
aws ec2 authorize-security-group-ingress \
    --group-name gaminder-sg \
    --protocol tcp \
    --port 443 \
    --cidr 0.0.0.0/0

# Creamos una regla de acceso MySQL
aws ec2 authorize-security-group-ingress \
    --group-name gaminder-sg \
    --protocol tcp \
    --port 3306 \
    --cidr 0.0.0.0/0

# Creamos una regla de acceso phpMyAdmin
aws ec2 authorize-security-group-ingress \
    --group-name gaminder-sg \
    --protocol tcp \
    --port 8080 \
    --cidr 0.0.0.0/0

