import TimeAndDate from "../../../UI/time-and-date/time-and-date.component"
import Weather from "../../../UI/weather/weather.component"
import ReligiousTimes from "../../../UI/religious-times/religious-times.component"
import { useMediaQuery } from 'react-responsive'


import styles from "./date-and-weather.module.css"
const DateAndWeather = () => {

    const isMobileDevice = useMediaQuery({
        query: "(max-width: 1200px)",
    });

    const isDesktop = useMediaQuery({
        query: "(min-width: 1200px)",
    });


    return (
        <>

            {
                isDesktop &&
                <div className={`${styles.date_and_weather_container} d-flex flex-column`}>
                    <TimeAndDate />
                    <Weather />
                    <ReligiousTimes />
                </div>
            }

            {
                isMobileDevice &&
                <div className={`${styles.date_and_weather_container} d-flex `}>
                    <TimeAndDate />
                    <Weather />
                    <ReligiousTimes />
                </div>
            }
        </>
    )
}

export default DateAndWeather;