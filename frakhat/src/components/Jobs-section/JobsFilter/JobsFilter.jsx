import React, { useEffect, useState } from 'react';
import styles from './JobsFilter.module.css'
import categoryIcon from '../../../assets/icons/jobs-category.svg'
import arrowDownIcon from '../../../assets/icons/jobs-arrow-down.svg'
import { api } from '../../../services';
import { useNavigate } from 'react-router-dom';

const JobsFilter = ({formData, setFormData}) => {
    const [collaboration, setCollaboration] = useState(true);
    const [workExperience, setWorkExperience] = useState(true);
    const [minimumSalary, setMinimumSalary] = useState(true);
    const navigate = useNavigate()

    const [ filterData, setFilterData ] = useState()
    
    const handleFilter = ({ target: { name, value } }) => {
        setFormData({
            ...formData,
            [name]: value
        })
        const queryParams = new URLSearchParams(formData);
        navigate(`/jobs/search?${queryParams.toString()}`);
    }

    useEffect(() => {
        (async () => {
            const { data } = await api().get('/data-search')
            setFilterData(data)
        })()
    }, [])

    return (
        <div className={styles.jobsFilterContainer}>
            <h2>فیلترها</h2>
            <div>
                <div onClick={() => setCollaboration(!collaboration)} className={styles.headFilters}>
                    <div>
                        <img src={categoryIcon} alt="" />
                        <h4>نوع همکاری</h4>
                    </div>
                    <img src={arrowDownIcon} alt="" />
                </div>
                {collaboration && (
                    <form className={styles.filterOptions}>
                        <label>
                            <input type="radio" name="employment_type" value="تمام وقت" onChange={handleFilter} />
                            تمام وقت
                        </label>
                        <label>
                            <input type="radio" name="employment_type" value="پاره وقت" onChange={handleFilter} />
                            پاره وقت
                        </label>
                        <label>
                            <input type="radio" name="employment_type" value="پروژه‌ای" onChange={handleFilter} />
                            پروژه‌ای
                        </label>
                        <label>
                            <input type="radio" name="employment_type" value="دورکاری" onChange={handleFilter} />
                            دورکاری
                        </label>
                        <label>
                            <input type="radio" name="employment_type" value="کارآموزی" onChange={handleFilter} />
                            کارآموزی
                        </label>
                    </form>
                )}
            </div>
            <div>
                <div onClick={() => setWorkExperience(!workExperience)} className={styles.headFilters}>
                    <div>
                        <img src={categoryIcon} alt="" />
                        <h4>سابقه کاری</h4>
                    </div>
                    <img src={arrowDownIcon} alt="" />
                </div>
                {workExperience && (
                    <form className={styles.filterOptions}>
                        <label>
                            <input type="radio" name="minimum_experience" value="بدون محدودیت" onChange={handleFilter} />
                            بدون محدودیت
                        </label>
                        <label>
                            <input type="radio" name="minimum_experience" value="کمتر از 2 سال" onChange={handleFilter} />
                            کمتر از 2 سال
                        </label>
                        <label>
                            <input type="radio" name="minimum_experience" value="بین 2 تا 5 سال" onChange={handleFilter} />
                            بین 2 تا 5 سال
                        </label>
                        <label>
                            <input type="radio" name="minimum_experience" value="بین 5 تا 8 سال" onChange={handleFilter} />
                            بین 5 تا 8 سال
                        </label>
                        <label>
                            <input type="radio" name="minimum_experience" value="بیش از 8 سال" onChange={handleFilter} />
                            بیش از 8 سال
                        </label>
                    </form>
                )}
            </div>
            <div>
                <div onClick={() => setMinimumSalary(!minimumSalary)} className={styles.headFilters}>
                    <div>
                        <img src={categoryIcon} alt="" />
                        <h4>حداقل حقوق</h4>
                    </div>
                    <img src={arrowDownIcon} alt="" />
                </div>
                {minimumSalary && (
                    <form className={styles.filterOptions}>
                        <label>
                            <input type="radio" name="minimum_salary" value="توافقی" onChange={handleFilter} />
                            توافقی
                        </label>
                        <label>
                            <input type="radio" name="minimum_salary" value="کمتر از 5 میلیون تومان" onChange={handleFilter} />
                            کمتر از 5 میلیون تومان
                        </label>
                        <label>
                            <input type="radio" name="minimum_salary" value="بین 5 تا 10 میلیون تومان" onChange={handleFilter} />
                            بین 5 تا 10 میلیون تومان
                        </label>
                        <label>
                            <input type="radio" name="minimum_salary" value="بین 10 تا 15 میلیون تومان" onChange={handleFilter} />
                            بین 10 تا 15 میلیون تومان
                        </label>
                        <label>
                            <input type="radio" name="minimum_salary" value="بین 15 تا 20 میلیون تومان" onChange={handleFilter} />
                            بین 15 تا 20 میلیون تومان
                        </label>
                        <label>
                            <input type="radio" name="minimum_salary" value="بیش از 20 میلیون تومان" onChange={handleFilter} />
                            بیش از 20 میلیون تومان
                        </label>
                    </form>
                )}
            </div>
        </div>
    );
};

export default JobsFilter;