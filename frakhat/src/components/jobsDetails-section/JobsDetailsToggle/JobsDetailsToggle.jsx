import { useState } from 'react'
import styles from './JobsDetailsToggle.module.css'
import DescriptionJobPosition from './DescriptionJobPosition/DescriptionJobPosition'
import AboutCompany from "./AboutCompany/AboutCompany";
import OtherJobPosition from "./OtherJobPosition/OtherJobPosition";

const JobsDetailsToggle = ({jobDetail}) => {
    const [roles, setRoles] = useState([
        { id: 'position', title: 'شرح موقعیت شغلی' },
        { id: 'about', title: 'درباره شرکت' },
        { id: 'other', title: 'سایر موقعیت‌های شغلی(1)' },
    ])

    const [activeComponent, setActiveComponent] = useState('position')

    const renderComponent = () => {
        switch (activeComponent) {
            case 'position':
            return <DescriptionJobPosition jobDetail={jobDetail}/>;
            case 'about':
            return <AboutCompany jobDetail={jobDetail}/>;
            case 'other':
            return <OtherJobPosition />;
            default:
                return <></>;
        }
    };

    return (
        <>
            <div className={styles.jobsToggleContainer}>
                <div className={`${styles.toggleButtons}`}>
                    {roles.map(item => (
                        <button onClick={() => setActiveComponent(item.id)} className={item.id === activeComponent ? styles.activeButton : styles.button} key={item.id}>{item.title}</button>
                    ))}
                </div>
            </div>
            {renderComponent()}
        </>
    )
}

export default JobsDetailsToggle