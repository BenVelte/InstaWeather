
let url;
let key;

/**
 * Start Programm
 */
function Initialize() 
{
    fetchWeather();   
}

/**
 * Get API Key from local file
 * @param {*} file 
 */
function getAPIKey(file)
{
    var rawFile = new XMLHttpRequest();
    rawFile.open("GET", file, false);
    rawFile.onreadystatechange = function ()
    {
        if(rawFile.readyState === 4)
        {
            if(rawFile.status === 200 || rawFile.status == 0)
            {
                key = rawFile.responseText;
            }
        }
    }
    rawFile.send(null);
}

/**
 * Fetch local weather data from OpenWeatherMap
 */
function fetchWeather() 
{
    getAPIKey("./APIKey.txt");
    
    let lat = 50.7667;
    let lon = 9.6;
    let lang = 'de';
    let units = 'metric';
    
    url = `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&appid=${key}&units=${units}&lang=${lang}`;
    
    fetch(url)
        .then(resp=> {
            if(!resp.ok) throw new Error(resp.statusText);

            return resp.json();
            })
        .then(data=> {
            createJPG(data);
            })
        .catch(console.error);
}


/**
 * Create JPG for GraphAPI
 * @param {*} weatherData 
 */
function createJPG(weatherData)
{

    //TODO:Fill variables for usefull informations

console.log(weatherData);
}


Initialize();
