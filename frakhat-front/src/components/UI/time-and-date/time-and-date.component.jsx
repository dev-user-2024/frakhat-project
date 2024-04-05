import { useState, useEffect } from "react"

import axios from "axios";
import { useMediaQuery } from 'react-responsive'

import Clock from 'react-live-clock';

import styles from "./time-and-date.module.css"

const GetDates = ({ day, month, year }) => {
    return (
        <li className={`${styles.time_and_date_item}`}>
            {`${day} ${month} ${year}`}
        </li>
    )
}

const TimeAndDate = () => {

    const [date, setDate] = useState({
        ghamariDay: "",
        ghamariMonth: "",
        ghamariYear: "",
        miladiDay: "",
        miladiMonth: "",
        miladiYear: "",
        shamsiDay: "",
        shamsiMonth: "",
        shamsiYear: ""
    })

    const isMobileDevice = useMediaQuery({
        query: "(max-width: 1200px)",
    });

    const isDesktop = useMediaQuery({
        query: "(min-width: 1200px)",
    });


    const monthNames = [
        {
            numberGhamari: "1",
            numberMiladi: "01",
            shamsiMonth: "فروردین",
            ghamariMonth: "محرم",
            miladiMonth: "ژانویه",
        },
        {
            numberGhamari: "2",
            numberMiladi: "02",
            shamsiMonth: "اردیبهشت",
            ghamariMonth: "صفر",
            miladiMonth: "فوریه",
        },
        {
            numberGhamari: "3",
            numberMiladi: "03",
            shamsiMonth: "خرداد",
            ghamariMonth: "ربیع‌الاول",
            miladiMonth: "مارس",
        },
        {
            numberGhamari: "4",
            numberMiladi: "04",
            shamsiMonth: "تیر",
            ghamariMonth: "ربیع‌الثانی",
            miladiMonth: "آوریل",
        },
        {
            numberGhamari: "5",
            numberMiladi: "05",
            shamsiMonth: "مرداد",
            ghamariMonth: "جمادی‌الاول",
            miladiMonth: "می",
        },
        {
            numberGhamari: "6",
            numberMiladi: "06",
            shamsiMonth: "شهریور",
            ghamariMonth: "جمادی‌الثانی",
            miladiMonth: "ژوئن",
        },
        {
            numberGhamari: "7",
            numberMiladi: "07",
            shamsiMonth: "مهر",
            ghamariMonth: "رجب",
            miladiMonth: "جولای",
        },
        {
            numberGhamari: "8",
            numberMiladi: "08",
            shamsiMonth: "آبان",
            ghamariMonth: "شعبان",
            miladiMonth: "آگوست",
        },
        {
            numberGhamari: "9",
            numberMiladi: "09",
            shamsiMonth: "آذر",
            ghamariMonth: "رمضان",
            miladiMonth: "سپتامبر",
        },
        {
            numberGhamari: "10",
            numberMiladi: "10",
            shamsiMonth: "دی",
            ghamariMonth: "شوال",
            miladiMonth: "اکتبر",
        },
        {
            numberGhamari: "11",
            numberMiladi: "11",
            shamsiMonth: "بهمن",
            ghamariMonth: "ذیقعده",
            miladiMonth: "نوامبر",
        },
        {
            numberGhamari: "12",
            numberMiladi: "12",
            shamsiMonth: "اسفند",
            ghamariMonth: "ذیحجه",
            miladiMonth: "دسامبر",
        },

    ]


    useEffect(() => {
        const getData = async () => {

            const { data } = await axios.get("https://api.keybit.ir/time/");
            setDate({
                shamsiDay: data.date.full.official.iso.en.slice(-2).startsWith("0") ? data.date.full.official.iso.en.slice(-1) : data.date.full.official.iso.en.slice(-2),

                ghamariDay: data.date.other.ghamari.iso.en.slice(-2).startsWith("-") ? data.date.other.ghamari.iso.en.slice(-1) : data.date.other.ghamari.iso.en.slice(-2),

                miladiDay: data.date.other.gregorian.iso.en.slice(-2).startsWith("-") ? data.date.other.gregorian.iso.en.slice(-1) : data.date.other.gregorian.iso.en.slice(-2),

                shamsiMonth: data.date.month.name,

                ghamariMonth: monthNames.filter((item) => item.numberGhamari === (data.date.other.ghamari.iso.en.slice(4, 7).endsWith("-") ? data.date.other.ghamari.iso.en.slice(5, 6) : data.date.other.ghamari.iso.en.slice(5, 7)))[0].ghamariMonth,

                miladiMonth: monthNames.filter((item) => item.numberMiladi === (data.date.other.gregorian.iso.en.slice(4, 7).endsWith("-") ? data.date.other.gregorian.iso.en.slice(5, 6) : data.date.other.gregorian.iso.en.slice(5, 7)))[0].miladiMonth,

                shamsiYear: data.date.year.number.en,

                ghamariYear: data.date.other.ghamari.iso.en.slice(0, 4),

                miladiYear: data.date.other.gregorian.iso.en.slice(0, 4)
            })

        }
        getData()

    },[monthNames])




    return (
        <>
            {
                isDesktop &&

                <div className={`${styles.time_and_date_container}`}>
                    <ul className={`${styles.time_and_date_list} d-flex flex-column`}>
                        <li className={`${styles.time_and_date_item}`}>
                            <Clock format={'HH:mm:ss'} ticking={true} timezone={'Asia/Tehran'} />
                        </li>
                        <GetDates day={date.shamsiDay} month={date.shamsiMonth} year={date.shamsiYear} />
                        <GetDates day={date.ghamariDay} month={date.ghamariMonth} year={date.ghamariYear} />
                        <GetDates day={date.miladiDay} month={date.miladiMonth} year={date.miladiYear} />
                    </ul>
                </div>
            }

            {
                isMobileDevice &&

                <div className={`${styles.time_and_date_container}`}>
                    <ul className={`d-flex h-100 flex-column justify-content-between`}>
                        <Clock format={'HH:mm:ss'} ticking={true} timezone={'iran'} />
                        <GetDates day={date.shamsiDay} month={date.shamsiMonth} year={date.shamsiYear} />
                        <GetDates day={date.ghamariDay} month={date.ghamariMonth} year={date.ghamariYear} />
                        <GetDates day={date.miladiDay} month={date.miladiMonth} year={date.miladiYear} />
                    </ul>
                </div>
            }

        </>
    )
}

export default TimeAndDate