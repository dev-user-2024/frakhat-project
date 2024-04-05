import styles from './JobsAdvancedSearch.module.css'
import searchIcon from '../../../assets/icons/landingJobs-search.svg'
import categoryIcon from '../../../assets/icons/landingJobs-category.svg'
import locationIcon from '../../../assets/icons/landingJobs-location.svg'
import { useNavigate } from 'react-router-dom';
import { useEffect, useState } from 'react';
import { api } from '../../../services';

const JobsAdvancedSearch = ({ formData, setFormData }) => {
    const navigate = useNavigate();
    const [ filterData, setFilterData ] = useState()

    const handleSubmit = async (e) => {
        e.preventDefault()
        const queryParams = new URLSearchParams(formData);
        navigate(`/jobs/search?${queryParams.toString()}`);
    }

    const handleSearch = ({ target: { name, value } }) => {
        setFormData({
            ...formData,
            [name]: value
        })
    }

    useEffect(() => {
        (async () => {
            const { data } = await api().get('/data-search')
            setFilterData(data)
        })()
    }, [])


    return (
        <div className={styles.searchContainer}>

            <form onSubmit={handleSubmit}>
                <div className={styles.searchInputs}>
                    <input
                        type="text"
                        placeholder='عنوان شغل، نام شرکت ، مهارت یا...'
                        name='title'
                        value={formData.title}
                        onChange={handleSearch}
                    />
                    <img src={searchIcon} alt="" />
                </div>
                <div className={styles.searchInputs}>
                    <select
                        name="jobGroup"
                        value={formData.jobGroup}
                        onChange={handleSearch}
                    >
                        <option value="">گروه شغلی</option>
                       {
                        filterData?.job_groups?.map(item => <option key={item.id} value={item.title}>{item.title}</option>)
                       }
                    </select>
                    <img src={categoryIcon} alt="" />
                </div>
                <div className={styles.searchInputs}>
                    <select
                        name='location'
                        value={formData.location}
                        onChange={handleSearch}
                    >
                        <option value="">همه‌استان‌ها</option>
                        {
                        filterData?.provinces?.map(item => <option key={item.id} value={item.title}>{item.title}</option>)
                       }
                    </select>
                    <img src={locationIcon} alt="" />
                </div>
                <div className={styles.submitButton}>
                    <button>جست‌‌و‌جو</button>
                </div>
            </form>
        </div>
    )
}

export default JobsAdvancedSearch