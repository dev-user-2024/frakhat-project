import { useState, useEffect } from 'react';
import axios from "axios";
import { useMediaQuery } from 'react-responsive'

import styles from "./religious-times.module.css"

const ItemTime = ({ title, time }) => {
    return (
        <div className={`${styles.item_time} d-flex justify-content-start align-items-center`}>
            <div className={` w-100 d-flex justify-content-between align-items-center gap-3`}>
                <p>{title}</p>
                <p>{time}</p>
            </div>
        </div>
    )
}

const ReligiousTimes = () => {

    const isMobileDevice = useMediaQuery({
        query: "(max-width: 1200px)",
    });

    const isDesktop = useMediaQuery({
        query: "(min-width: 1200px)",
    });

    const [iranCities, setIranCities] = useState([])
    const [citySelectedCode, setCitySelectedCode] = useState(1)
    const [cityTime, setCityTime] = useState([])



    useEffect(() => {
        axios.get("https://prayer.aviny.com/api/city").then((res) => {
            setIranCities(res.data.slice(0, 31));
        });
    }, [])

    const handleFilter = (e) => {
        e.preventDefault();
        setCitySelectedCode(e.target.value)
    }

    useEffect(() => {

        const getCityTime = async () => {

            await axios.get(`https://prayer.aviny.com/api/prayertimes/${citySelectedCode}`)
                .then(({ data }) => {
                    setCityTime([
                        {
                            title: "اذان صبح",
                            clock: data.Imsaak

                        },
                        {
                            title: "طلوع آفتاب",
                            clock: data.Sunrise
                        },
                        {
                            title: "اذان ظهر",
                            clock: data.Noon
                        },
                        {
                            title: "غروب آفتاب",
                            clock: data.Sunset
                        },
                        {
                            title: "اذان مغرب",
                            clock: data.Maghreb
                        },
                        {
                            title: "نیمه شب شرعی",
                            clock: data.Midnight
                        },
                    ]);
                })
        }

        getCityTime()

    }, [citySelectedCode])



    return (
        <>
            {
                isDesktop &&
                <div className={`${styles.religious_times_container} d-flex flex-column`}>
                    <div className={`${styles.religious_times_header} d-flex justify-content-between`}>
                        <p>اوقات شرعی</p>

                        <div className={styles.filter__widget}>
                            <select onChange={handleFilter} >
                                {
                                    iranCities.map((item, index) => (
                                        <option value={item.Code} key={index}>{item.Name}</option>
                                    ))
                                }
                            </select>
                        </div>
                    </div >


                    {
                        cityTime.map((item, index) => (
                            <ItemTime title={item.title} time={item.clock} key={index} />
                        ))
                    }


                    {

                    }

                </div>
            }

            {
                isMobileDevice &&
                <div className={`${styles.religious_times_container} d-flex flex-column`}>
                    <div className={`${styles.religious_times_header} d-flex justify-content-between`}>
                        <div className={styles.filter__widget}>
                            <select onChange={handleFilter} width="300" >
                                {
                                    iranCities.map((item, index) => (
                                        <option value={item.Code} key={index}>{item.Name}</option>
                                    ))
                                }
                            </select>
                        </div>
                    </div >


                    {
                        cityTime.filter((number,index) => index % 2 === 0).map((item, index) => (
                            <ItemTime title={item.title} time={item.clock} key={index} />
                        ))
                    }


                    {

                    }

                </div>
            }

        </>
    );
}

export default ReligiousTimes