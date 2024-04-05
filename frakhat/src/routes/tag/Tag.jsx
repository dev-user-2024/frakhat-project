import React, { useState } from 'react'
import style from './tag.module.css'
import TagsCardSection from '../../components/tagsCardSection/TagsCardSection/TagsCardSection'
import TagsPaginationSection from '../../components/tagsCardSection/TagsPaginationSection/TagsPaginationSection'

const Tag = () => {

    return (
        <div className={style.tagsContainer}>
            <div className={style.tagsTitle}>
                <h4>مطالب مرتبط با: </h4>
                <span>لیونل مسی</span>
            </div>

            <div className={style.tagsCards}>
                <TagsCardSection />
            </div>

            <div className={style.tagsPagination}>
                <TagsPaginationSection />
            </div>
        </div>
    )
}

export default Tag