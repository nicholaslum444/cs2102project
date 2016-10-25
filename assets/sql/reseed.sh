#!/bin/bash
psql -d nusmaids -a -f schema.sql && psql -d nusmaids -a -f seeds.sql
