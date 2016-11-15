# PHG - Public Health Gateway
PHG is a realtime gateway for recording and analysing road accidents in Kenya. It then uses the data to provide realtime information specifically to motorcycle riders who make a bigger percentage of road related accidents. 

The web portal allows authorised users to record accidents and this data is processed in the backend to come up with predefined hotspots based on the frequency of accident occurence at a given point. The data is stored in NoSQL collections which are accessed via the restful gLibrary service. 

The gateway also has a mobile app which recives realtime processed data from the web portal via a simple REST callback. This data is dispatched with every significant change in the GPS location of the mobile device. The dispatched information is then translated to voice data (to avoid distractins when reading textual information and riding at the same time) which alerts the rider of any impending accident or blackspot ahead. This information hence plays a major role in enabling the motorist make informed decisions and minimize the number of accidents happening

