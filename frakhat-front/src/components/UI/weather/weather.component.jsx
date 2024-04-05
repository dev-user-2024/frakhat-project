import { useState, useEffect } from "react"
import axios from "axios";
import { useMediaQuery } from 'react-responsive'


import styles from "./weather.module.css"

import sun from "../../../assets/images/sun.svg"
import moon from "../../../assets/images/moon.svg"
import rain from "../../../assets/images/rain.png"
import snow from "../../../assets/images/snow.png"
import storm from "../../../assets/images/storm.png"
import fog from "../../../assets/images/fog.png"
// import partyCloudy from "../../../assets/images/partyCloudy.png"


let clock = new Date().getHours();

const Weather = () => {

  const [degree, setDegree] = useState("")
  const [weatherType, setWeatherType] = useState({
    type: "",
    icon: ""
  })
  const [timeZone, setTimeZone] = useState({
    time: "",
    bgColor: ""
  })

  const isMobileDevice = useMediaQuery({
    query: "(max-width: 1200px)",
  });

  const isDesktop = useMediaQuery({
    query: "(min-width: 1200px)",
  });

  const groupOfWeather = [
    {
      nameOfGroup: "Thunderstorm",
      name: "طوفانی",
      "icon1": storm
    },
    {
      nameOfGroup: "Drizzle",
      name: "بارانی",
      "icon1": rain
    },
    {
      nameOfGroup: "Rain",
      name: "بارانی",
      "icon1": rain
    },
    {
      nameOfGroup: "Snow",
      name: "برفی",
      "icon1": snow
    },
    {
      nameOfGroup: "Atmosphere",
      name: "آفتابی",
      "icon1": sun
    },
    {
      nameOfGroup: "Mist",
      name: "مه آلود",
      "icon1": fog
    },
    {
      nameOfGroup: "Smoke",
      name: "آلوده",
      "icon1": fog
    },
    {
      nameOfGroup: "Haze",
      name: "مه آلود",
      "icon1": fog
    },
    {
      nameOfGroup: "Dust",
      name: "آلوده",
      "icon1": fog
    },
    {
      nameOfGroup: "Fog",
      name: "مه آلود",
      "icon1": fog
    },
    {
      nameOfGroup: "Sand",
      name: "غبار آلود",
      "icon1": fog
    },
    {
      nameOfGroup: "Dust",
      name: "غبار آلود",
      "icon1": fog
    },
    {
      nameOfGroup: "Ash",
      name: "آلوده",
      "icon1": "01d"
    },
    {
      nameOfGroup: "Squall",
      name: "طوفانی",
      "icon1": storm
    },
    {
      nameOfGroup: "Tornado",
      name: "طوفانی",
      "icon1": storm
    },
    {
      nameOfGroup: "Clear",
      name: "آسمان صاف",
      "icon1": moon,
      "icon2": sun,
    },
    {
      nameOfGroup: "Clouds",
      name: "ابری",
      "icon1": storm
    }
  ]

  const getWeather = async () => {
    const response = await axios.get("https://api.openweathermap.org/data/2.5/weather?q=Tehran&appid=b38a79ac2b73cf12236f47a074f35669")
    const data = response.data;
    setDegree((Math.floor(((data.main.temp) - 273))));

    let weather;
    groupOfWeather.forEach((item) => {
      if (item.nameOfGroup === data.weather[0].main) {
        weather = item
      }
    });
    setWeatherType({
      type: weather.name,
      icon: weather.name === "آسمان صاف" && timeZone === "day" ? weather.icon2 : weather.icon1
    });
  }

  const getDayOrNight =  () => {

    if (clock >= 5) {
      setTimeZone({
        time: "day",
        bgColor: "253.96deg, #FF96B5 0%, #FB9265 100%"
      })
    } if (clock > 7) {
      setTimeZone({
        time: "day",
        bgColor: "253.96deg, #1CD1EA 0%, #539CF1 100%"
      })
    } if (clock > 16) {
      setTimeZone({
        time: "day",
        bgColor: "253.96deg, #FF96B5 0%, #FB9265 100%"
      })
    } if (clock > 18) {
      setTimeZone({
        time: "night",
        bgColor: "253.96deg, #070485 0%, #130734 100%"
      })
    } if (clock < 5) {
      setTimeZone({
        time: "night",
        bgColor: "253.96deg, #070485 0%, #130734 100%"
      })
    }

  }

  useEffect(() => {
    getWeather()
    getDayOrNight()
  },[])



  return (
    <>
      {
        isDesktop &&
        <div className={`${styles.weather_container} d-flex justify-content-between jr align-items-center`} style={{ background: `linear-gradient(${timeZone.bgColor})` }} >
          <div>
            <h4>{`${degree}°`}</h4>
            <h5>{`${weatherType.type}`}</h5>
          </div>
          <img src={weatherType.icon} alt="icon" />
        </div>
      }

      {
        isMobileDevice &&
        <div className={`${styles.weather_container}`} >
          <h5>{`${weatherType.type}`}</h5>
        </div>
      }

    </>
  )
}

export default Weather