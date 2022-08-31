FROM ubuntu:latest
ENV DEBIAN_FRONTEND noninteractive
ENV DEBCONF_NONINTERACTIVE_SEEN true
RUN apt-get update -y
RUN apt-get install php -y
RUN apt-get install git -y
WORKDIR /var/www/html
RUN git clone https://github.com/sefacicekli/saveat.git 
WORKDIR /var/www/html/saveat
CMD ["php", "saveat"]
