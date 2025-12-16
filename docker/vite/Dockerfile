FROM node:20-alpine

# Install frontend dependencies during build so container start is fast
WORKDIR /opt/vite
COPY package*.json ./
RUN npm ci

COPY docker/vite/entrypoint.sh /usr/local/bin/vite-entrypoint
RUN chmod +x /usr/local/bin/vite-entrypoint

WORKDIR /var/www/html
CMD ["vite-entrypoint"]
