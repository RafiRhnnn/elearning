# Gunakan base image Nginx resmi
FROM nginx:latest

# Hapus default konfigurasi Nginx
RUN apt update
RUN install certbot python3-certbot-nginx -y

# Ekspos port Nginx
EXPOSE 80
EXPOSE 443

# Perintah default Nginx
CMD ["nginx", "-g", "daemon off;"]