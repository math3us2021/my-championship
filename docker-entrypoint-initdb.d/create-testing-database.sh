#!/bin/bash
set -e

# Espera o MySQL iniciar
echo "Esperando o MySQL iniciar..."
sleep 20

# Executa o comando SQL para criar o banco de dados
echo "Criando banco de dados mychampionship..."
mysql -u root -p"${MYSQL_ROOT_PASSWORD}" -e "CREATE DATABASE IF NOT EXISTS mychampionship;"

echo "Banco de dados mychampionship criado com sucesso."

