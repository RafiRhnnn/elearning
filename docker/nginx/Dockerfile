FROM nginx:latest

RUN apt update
# Hapus default konfigurasi Nginx
RUN apt install certbot python3-certbot-nginx


# Ekspos port Nginx
EXPOSE 80
EXPOSE 443

# Perintah default Nginx
CMD ["nginx", "-g", "daemon off;"]