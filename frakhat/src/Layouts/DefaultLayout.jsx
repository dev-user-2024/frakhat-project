import React, { Suspense } from 'react'
import Header from './header/header.component'
import Navigation from './navigation/navigation.component'
import Footer from './footer/footer.component'
import { Outlet } from 'react-router-dom'

const LayoutDefault = () => {
    return (
        <div>
            {/* <Header /> */}
            <Navigation />
            <div>
                <Suspense >
                    <Outlet />
                </Suspense>
            </div>
            <Footer />
        </div>
    )
}

export default LayoutDefault