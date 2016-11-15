# PHG - Public Health Gateway
PHG is a realtime gateway for recording and analysing road accidents in Kenya. It then uses the data to provide realtime information specifically to motorcycle riders who make a bigger percentage of road related accidents. 

The web portal allows authorised users to record accidents and this data is processed in the backend to come up with predefined hotspots based on the frequency of accident occurence at a given point. The data is stored in NoSQL collections which are accessed via the restful gLibrary service. 

The gateway also has a mobile app which recives realtime processed data from the web portal via a simple REST callback. This data is dispatched with every significant change in the GPS location of the mobile device. The dispatched information is then translated to voice data (to avoid distractins when reading textual information and riding at the same time) which alerts the rider of any impending accident or blackspot ahead. This information hence plays a major role in enabling the motorist make informed decisions and minimize the number of accidents happening

## Future Gateway
>> Future Gateway acts as the link between the client and server based actions. All reqeuest pass through the future gateway ; where for a request to get the anticipated resposne the gateway has to be up and running. Future gateway acts as the control point of the analyzer; which is a section of the engine which handles data analystics. This specific section ensures that the mobile applicatioln has the ability to smartly identify and map out black spots graphically via heatmaps.

