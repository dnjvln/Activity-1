<template>
    <div class="main-container">
        <MainHeaderComponent />
        <NavbarComponent
            :haircareUrl="haircareUrl"
            :homeUrl="homeUrl"
            :skincareUrl="skincareUrl"
        />


        <div class="main-container-2">
            <div class="flex-row">
                <div class="line"></div>
                <span class="title-holder">ORDER DETAILS</span>
                <div class="line-1"></div>
            </div>
        </div>


        <div class="main-container-orderdetails">
            <div class="rectangle-orderdetails">
                <div class="flex-row-df-orderdetails">
                    <span class="products-ordered-orderdetails">Products Ordered</span>
                    <span class="quantity-orderdetails">Quantity</span>
                </div>
                <div class="flex-row-fe-orderdetails">
                    <div class="image-orderdetails"></div>
                    <span class="tresemme-keratin-smooth-orderdetails"
                    >TRESEMME Keratin Smooth Anti-Frizz Shampoo 340ml | Shampoo &
          Conditioner</span
                    ><span class="quantity-2-orderdetails">2</span>
                </div>
                <div class="flex-row-orderdetails">
                    <div class="image-1-orderdetails"></div>
                    <span class="garnier-micellar-water-orderdetails"
                    >Garnier Micellar Water with Argan Oil (125ml/400mL) - Waterproof
          Makeup Remover, Facial Cleanser</span
                    ><span class="number-1-orderdetails">1</span>
                </div>
            </div>
            <div class="rectangle-2-orderdetails">
                <div class="flex-row-a-orderdetails">
                    <div class="ellipse-orderdetails"></div>
                    <div class="ellipse-3-orderdetails"></div>
                    <div class="ellipse-4-orderdetails"></div>
                    <div class="box-orderdetails"><div class="icon-orderdetails"></div></div>
                    <div class="user-orderdetails"><div class="icon-5-orderdetails"></div></div>
                    <div class="truck-orderdetails"><div class="icon-6-orderdetails"></div></div>
                    <div class="line-orderdetails"></div>
                    <div class="line-7-orderdetails"></div>
                </div>
                <div class="flex-row-bb-orderdetails">
                    <span class="pickup-orderdetails">Pickup</span>
                    <span class="shipping-orderdetails">Shipping</span>
                    <span class="delivery-orderdetails">Delivery</span>
                </div>
                <div class="flex-row-dea-orderdetails">
                    <div class="ellipse-8-orderdetails"></div>
                    <span class="mar-orderdetails">Mar 16 05:45</span>
                    <span class="on-the-way-orderdetails">On the way to Logistics Facility</span>
                    <div class="truck-9-orderdetails"><div class="icon-a-orderdetails"></div></div>
                </div>
                <div class="flex-row-c-orderdetails">
        <span class="package-handed-over-orderdetails"
        >Your package has been handed over to LEX PH</span
        >
                    <div class="line-b-orderdetails"></div>
                </div>
                <div class="flex-row-c-c-orderdetails">
                    <div class="ellipse-d-orderdetails"></div>
                    <span class="packed-by-seller-orderdetails">Packed by seller / warehouse</span>
                    <span class="mar-15-14-56-orderdetails">Mar 15 14:56</span>
                    <div class="truck-e-orderdetails"><div class="icon-f-orderdetails"></div></div>
                </div>
                <div class="flex-row-c-10-orderdetails">
        <span class="your-package-handover-orderdetails"
        >Your package has been handed over to our logistics partner</span
        >
                    <div class="line-11-orderdetails"></div>
                </div>
                <div class="flex-row-e-orderdetails">
                    <div class="group-12-orderdetails"></div>
                    <span class="mar-14-56-orderdetails">Mar 14 14:56</span>
                    <span class="parcel-sorting-center-orderdetails"
                    >Your parcel has been received by sorting center</span
                    >
                </div>
                <span class="tracking-number-orderdetails">Tracking Number: MP00436467547</span>
            </div>
        </div>
    </div>

        <FooterComponent
        :aboutUrl="aboutUrl"
        :homeUrl="homeUrl"
        :contactUrl="contactUrl"
    />
</template>

<script>
import '/resources/css/skincare.css';
import '/resources/css/index.css';
import '/resources/css/details.css';
import {defineComponent} from 'vue';
import {Link} from '@inertiajs/inertia-vue3';
import MainHeaderComponent from '@/Components/MainHeaderComponent.vue';
import FooterComponent from '@/Components/FooterComponent.vue';
import NavbarComponent from '@/Components/NavbarComponent.vue';

export default defineComponent({
    name: 'Details',
    components: {
        MainHeaderComponent,
        FooterComponent,
        NavbarComponent,
        Link,
    },
    data() {
        return {
            aboutUrl: '/about',
            homeUrl: '/home',
            contactUrl: '/contact',
            haircareUrl: '/haircare',
            makeupUrl: '/makeup',
            skincareUrl: '/skincare',
        };
    },
});
</script>

