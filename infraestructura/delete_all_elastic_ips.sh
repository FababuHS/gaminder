#!/bin/bash
set -x

# Deshabilitamos la paginación de la salida de los comandos de AWS CLI
# Referencia: https://docs.aws.amazon.com/es_es/cli/latest/userguide/cliv2-migration.html#cliv2-migration-output-pager
export AWS_PAGER=""

# Obtenemos la lista de direcciones IP elásticas
ELASTIC_IDS=$(aws ec2 describe-addresses --query Addresses \
            --query Addresses[*].AllocationId \
            --output text)

# Recorremos la lista 
for ID in $ELASTIC_IDS
do
    echo "Eliminando $ID ..."
    aws ec2 release-address --allocation-id $ID
done