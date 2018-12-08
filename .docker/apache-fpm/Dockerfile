FROM httpd:2.4-alpine

ARG HOST_UID=1000
ARG WEB_USER=www-data
ARG WEB_GROUP=www-data
ARG APACHE_ROOT_DIR=/usr/local/apache2

# Copying vhost config file to Apache container
COPY ./config/httpd-vhosts.conf ${APACHE_ROOT_DIR}/conf/extra/httpd-vhosts.conf

# Assigning web group to vhost config
RUN chgrp -R ${WEB_GROUP} ${APACHE_ROOT_DIR}/conf/extra/httpd-vhosts.conf

# Inserting include vhost line into global httpd configuration:
RUN echo "Include ${APACHE_ROOT_DIR}/conf/extra/httpd-vhosts.conf" \
    >> ${APACHE_ROOT_DIR}/conf/httpd.conf

# Bind host user to apache container:
RUN apk --no-cache add shadow \
    && usermod -u $HOST_UID ${WEB_USER} \
    && groupmod -g $HOST_UID ${WEB_GROUP} \
    && chgrp -R ${WEB_GROUP} ${APACHE_ROOT_DIR}
