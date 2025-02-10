<template>
    <AdminSidebar />

    <div class="dashboard">
        <div class="overlap-wrapper">
            <div class="overlap">

                <AdminProfile />

                <div class="overlap-2">
                    <div class="widget">
                        <div class="background"></div>
                        <div class="text-wrapper-9">Dashboard</div>
                    </div>
                    <div class="boxes-containerss">
                    <div class="rectangle-4"></div>
                    <div class="text-wrapper-10">10</div>
                    <div class="text-wrapper-11">Makeup Products</div>
                    <div class="group">
                        <div class="overlap-3">
                            <div class="text-wrapper-12">10</div>
                            <div class="text-wrapper-13">Skincare Products</div>
                        </div>
                        <div class="overlap-group-wrapper">
                            <div class="overlap-group-2">
                                <div class="rectangle-5"></div>
                                <div class="text-wrapper-14">Users</div>
                                <div class="text-wrapper-15">2</div>
                            </div>
                        </div>
                        <div class="div-wrapper">
                            <div class="overlap-group-2">
                                <div class="text-wrapper-16">1</div>
                                <div class="text-wrapper-17">Sellers</div>
                            </div>
                        </div>
                        <div class="group-wrapper">
                            <div class="group-2">
                                <div class="overlap-group-2">
                                    <div class="text-wrapper-18">10</div>
                                    <div class="text-wrapper-19">Hair Care Products</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import '/resources/admincss/index.css';
import AdminSidebar from '@/Components/Admin/AdminSidebar.vue';
import AdminProfile from '@/Components/Admin/AdminProfile.vue';
export default {
    components: {
        AdminSidebar,
        AdminProfile,
    },
    props: {
        adminName: {
            type: String,
            required: true,
        },
    },
};
</script>

<style scoped>

.boxes-containerss{
    position: absolute;
    left: -90px;
}

.dashboard .rectangle-4 {
    position: absolute;
    width: 219px;
    height: 170px;
    top: 351px;
    left: 657px;
    background-color: #dbbfff;
    border-radius: 12px;
}

.dashboard .text-wrapper-10 {
    position: absolute;
    width: 59px;
    top: 398px;
    left: 743px;
    font-family: "Roboto-Medium", Helvetica;
    font-weight: 500;
    font-size: 40px;
}

.dashboard .text-wrapper-11 {
    position: absolute;
    width: 182px;
    top: 441px;
    left: 681px;
    font-family: "Roboto-Medium", Helvetica;
    font-weight: 500;
    font-size: 20px;
}

.dashboard .group {
    position: absolute;
    top: 98px;
    left: 186px;
}

.dashboard .overlap-3 {
    position: absolute;
    width: 219px;
    height: 170px;
    top: 2px;
    left: 621px;
    background-color: #dbbfff;
    border-radius: 12px;
}

.dashboard .text-wrapper-12 {
    position: absolute;
    top: 43px;
    left: 84px;
    font-family: "Roboto-Medium", Helvetica;
    font-weight: 500;
    font-size: 40px;
}

.dashboard .text-wrapper-13 {
    position: absolute;
    top: 104px;
    left: 28px;
    font-family: "Roboto-Medium", Helvetica;
    font-weight: 500;
    font-size: 20px;
}

.dashboard .overlap-group-wrapper {
    position: absolute;
    width: 223px;
    height: 170px;
    top: 0;
    left: 0;
}

.dashboard .overlap-group-2 {
    position: relative;
    width: 219px;
    height: 170px;
    background-color: #dbbfff;
    border-radius: 12px;
}

.dashboard .rectangle-5 {
    position: absolute;
    width: 219px;
    height: 170px;
    background-color: #dbbfff;
    border-radius: 12px;
}

.dashboard .text-wrapper-14 {
    position: absolute;
    top: 106px;
    left: 83px;
    font-family: "Roboto-Medium", Helvetica;
    font-weight: 500;
    font-size: 20px;
}

.dashboard .text-wrapper-15 {
    position: absolute;
    top: 43px;
    left: 97px;
    font-family: "Roboto-Medium", Helvetica;
    font-weight: 500;
    font-size: 40px;
}

.dashboard .div-wrapper {
    position: absolute;
    width: 223px;
    height: 170px;
    top: 0;
    left: 310px;
}

.dashboard .text-wrapper-16 {
    position: absolute;
    top: 47px;
    left: 96px;
    font-family: "Roboto-Medium", Helvetica;
    font-weight: 500;
    font-size: 40px;
}

.dashboard .text-wrapper-17 {
    position: absolute;
    top: 106px;
    left: 79px;
    font-family: "Roboto-Medium", Helvetica;
    font-weight: 500;
    font-size: 20px;
}

.dashboard .group-wrapper {
    position: absolute;
    top: 253px;
    left: 151px;
}

.dashboard .group-2 {
    width: 223px;
    height: 170px;
}

.dashboard .text-wrapper-18 {
    position: absolute;
    top: 47px;
    left: 86px;
    font-family: "Roboto-Medium", Helvetica;
    font-weight: 500;
    font-size: 40px;
}

.dashboard .text-wrapper-19 {
    position: absolute;
    top: 106px;
    left: 27px;
    font-family: "Roboto-Medium", Helvetica;
    font-weight: 500;
    font-size: 20px;
}

.no-link-style {
    text-decoration: none;
    color: inherit;
}

.no-link-style:hover {
    color: #333;
}
</style>

