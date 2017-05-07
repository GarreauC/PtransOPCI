EthnoDoc project source files
========================

* Source files for the EthnoDoc project, in parternship with the Graduate School of Engineering of the University of Nantes and the EthnoDoc/RADdO association

project installation :
---------

* If you do not have composer installed on your machine :
```
    $ php -r "readfile('https://getcomposer.org/installer');" | php
```
* then
```
    $ git clone https://github.com/dalilanab/EthnoDoc.git
    $ php composer.phar install
    $ php app/console doctrine:database:create
    $ php app/console doctrine:schema:update --force
```

Java installation (Windows):
---------------------
* Download the Java JDK:
```
    http://www.oracle.com/technetwork/java/javase/downloads/jdk8-downloads-2133151.html
```
* Create the JAVA_HOME environment variable directing to the JAVA/jre
  directory in your Program Files or Program Files (x86) directory
* Create the CLASSPATH environment variable :
```
    %JAVA_HOME%\lib
```
* Edit the PATH variable to add the following :
```
    %JAVA_HOME%\bin
```

Run Elasticsearch :
-------------------------
* this step may require *curl*
* Go into the elasticsearch directory
* Start the first elasticsearch node :
```
    $ elasticsearch-1.4.3_node1\bin\elasticsearch
```
* Start the second elasticsearch node :
```
    $ elasticsearch-1.4.3_node2\bin\elasticsearch
```
* Start the third elasticsearch node :
```
    $ elasticsearch-1.4.3_node3\bin\elasticsearch
```
* Start the fourth elasticsearch node :
```
    $ elasticsearch-1.4.3_node4\bin\elasticsearch
```
* Start the fifth elasticsearch node :
```
    $ elasticsearch-1.4.3_node5\bin\elasticsearch
```
* Check that the server is running :
```
    http://localhost:9200/
```
* Check  the health of your cluster :
```
    http://localhost:9200/_plugin/head/
```

Reset the indexes :
-----------------------
* Run the following command line :
```
    $php app/console fos:elastica:populate
```