psql -v ON_ERROR_STOP=1 --username "$POSTGRES_USER" --dbname "$POSTGRES_DB" <<-EOSQL
    CREATE USER activesys_user WITH PASSWORD 'secret';
    CREATE DATABASE activesys;
    GRANT ALL PRIVILEGES ON DATABASE activesys TO activesys_user;
EOSQL
