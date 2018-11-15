# Water Level Monitoring Device

Overuse of water is one of the present day concerns which has not yet got any perfect solutions. Families tend to be unaware of the amount of water they are using per day or per month. Electric motors are usually found across most houses, with which we could detect the amount of water consumed in a month. But this does not notify a person about wastage or over usage of water.

So we propose a system that notifies the person with the amount of water he/she has consumed for a period of time. For eg: the notification can be the usage of water per day. This helps a person to become cautious about the amount of water he uses for a period of time.

This data could be displayed on a web application, in the form of a graph which plots amount of water against time. The dashboard can provide further assistance so that each time when the water is used, the user becomes cautious about the wastage of water.

### Applications of our project
Our device can be fit in overhead or underground tanks used in houses, schools/colleges, industries etc. It can be used to:
* Automatically turn on/off water supply
* Minimize wastage of water
* Get different statistics of water usage

### Brief technical description
We use a waterproof ultrasonic module to get the level of water. The level of water is sent to nodemcu via UART. The nodemcu then sends this data to a remote server via wifi. On the server the a php code receives this data and saves it to a database which is then visualized in the form of a graph in the website.

### Contributors:
* Krishnan Iyer (AM.EN.U4EEE16016)
* Siddharth Muralee (AM.EN.U4CSE16257)
* Aswin M Guptha (AM.EN.U4CSE15015)
* Akshay Ajayan (AM.EN.U4CSE15206)
* Abhinand N (AM.EN.U4CSE15201)
