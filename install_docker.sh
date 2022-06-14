#!/bin/bash
set -x

USERNAME=ubuntu

apt update

curl -fsSL https://get.docker.com -o get-docker.sh

sh ./get-docker.sh

usermod -aG docker $USERNAME

systemctl start docker

usermod -aG docker $USERNAME

apt install docker-compose -y