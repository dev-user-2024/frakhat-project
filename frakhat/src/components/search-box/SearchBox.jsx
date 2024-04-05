
import { useState } from 'react'
import { Link } from "react-router-dom"

import styles from "./SearchBox.module.css"
import searchIcon from "../../assets/icons/search-normal.svg"
import searchCloseIcon from "../../assets/icons/close-line-icon.svg"




const SearchBox = () => {

    const [clicked, setClicked] = useState(false);
    const [value, setValue] = useState("")


    return (
        <div className={`${styles.SearchBox} ${clicked ? styles.SearchBox_open : " "}`}>

            <div className={`${styles.SearchBox_inputs} ${clicked ? styles.SearchBox_open : ""} `}>
                <input
                    type="text"
                    placeholder="جستجو..."
                    value={value}
                    onChange={e => setValue(e.target.value)} />
                {clicked ? <Link to={`/search-result/${value}`}> <img className="mx-4" src={searchIcon} alt="" /></Link> : ""}

                <div className={styles.SearchBox_icon} onClick={() => setClicked(!clicked)}>
                    {!clicked ? <img src={searchIcon} alt="" /> : <img src={searchCloseIcon} alt="" />}
                </div>
            </div>

        </div>
    )
}

export default SearchBox