
import React from 'react'
import styles from "./LoadingPage.module.css"

const LoadingPage = () => {
    return (
        <div className={styles.loader_container}>
            <div className={styles.spinner}></div>
        </div>
    )
}

export default LoadingPage