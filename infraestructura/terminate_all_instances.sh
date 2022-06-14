#!/bin/bash
set -x

# Deshabilitamos la paginación de la salida de los comandos de AWS CLI
# Referencia: https://docs.aws.amazon.com/es_es/cli/latest/userguide/cliv2-migration.html#cliv2-migration-output-pager
export AWS_PAGER=""

# Eliminamos todas las intancias
aws ec2 terminate-instances --instance-ids $(aws ec2 describe-instances --query "Reservations[*].Instances[*].InstanceId" --output text)