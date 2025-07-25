# Gunakan base image Nginx resmi
FROM nginx:latest

# Hapus default konfigurasi Nginx
RUN rm /etc/nginx/conf.d/default.conf



# Ekspos port Nginx
EXPOSE 80

# Perintah default Nginx
CMD ["nginx", "-g", "daemon off;"]