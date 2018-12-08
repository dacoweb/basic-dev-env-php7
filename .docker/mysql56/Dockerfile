FROM mysql:5.6

ARG HOST_UID=1000
ARG MYSQL_CONTAINER_USER=mysql
ARG MYSQL_CONTAINER_GROUP=mysql

RUN sed -i "s/#log-error/log-error/g" /etc/mysql/mysql.conf.d/mysqld.cnf

RUN usermod -u $HOST_UID ${MYSQL_CONTAINER_USER} \
 && groupmod -g $HOST_UID ${MYSQL_CONTAINER_GROUP}

COPY ./config/zz-custom.cnf /etc/mysql/conf.d/zz-custom.cnf
