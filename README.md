# Online-Compiler

This is an online compiler that can compile and run C/C++ and Java program.One can also login and see his/her recent history and can also upload his/her code  and input file.

*Note: Some features of the project can't be used on the demo link because I have a free account on open shift so I don't have enough pods.*

## Language

* C
* C++
* Java

## Prerequisites

* Linux
* gcc
* g++
* Java compiler
* Lamp

## Local Installation

Clone the project

```sh
git clone https://github.com/creyente1897/online-compiler.git
```

Compiler installation

* C/C++

```sh
sudo add-apt-repository ppa:ubuntu-toolchain-r/test
sudo apt-get update
sudo apt-get install g++-4.8
sudo ln -f -s /usr/bin/g++-4.8 /usr/bin/g++
```

* Java

```sh
sudo add-apt-repository ppa:openjdk-r/ppa  
sudo apt-get update   
sudo apt install openjdk-8-jre
```

If you do not have lamp installed on your linux machine pleae do so in order to run the project locally.

- [LAMP INSTALLATION GUIDE FOR UBUNTU](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-ubuntu-18-04)
