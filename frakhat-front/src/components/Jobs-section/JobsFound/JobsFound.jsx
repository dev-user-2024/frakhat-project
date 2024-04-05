import styles from './JobsFound.module.css'
import briefcaseIcon from '../../../assets/icons/jobs-briefcase.svg'
import sortIcon from '../../../assets/icons/jobs-sort.svg'
import { useEffect } from 'react'
import { useNavigate } from 'react-router-dom'

const JobsFound = ({ formData, setFormData }) => {
    const navigate = useNavigate()

    const handleSortData = ({ target: { name, value } }) => {
        setFormData({
            ...formData,
            [name]: value
        })
        const queryParams = new URLSearchParams(formData);
        navigate(`/jobs/search?${queryParams.toString()}`);
    }

    return (
        <div className={styles.jobsFound}>
            <div className={styles.activeJobs}>
                <img src={briefcaseIcon} alt="" />
                {/* <span>10,450 </span> */}
                <p>موقعیت شغلی فعال یافت شد</p>
            </div>
            <div className={styles.sort}>
                <div>
                    <img src={sortIcon} alt="" />
                    <p>مرتب سازی بر اساس</p>
                </div>
                <div>
                    <div className={styles.searchInputs}>
                        <select
                            name="sort"
                            value={formData.sort}
                            onChange={handleSortData}
                        >
                            <option value="">گروه شغلی</option>
                            <option value="-">-</option>
                            <option value="-">-</option>
                            <option value="-">-</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    )
}

export default JobsFound