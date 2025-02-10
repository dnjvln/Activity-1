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
                    
<div class="main-stats-wrapper">
                <div class="stats-container">
                    <!-- First Row -->
                    <div class="stats-row">
                        <div class="stat-box">
                            <div class="stat-value">{{ userCount }}</div>
                            <div class="stat-label">Users</div>
                        </div>
                        <div class="stat-box">
                            <div class="stat-value">{{ approvedSellersCount }}</div>
                            <div class="stat-label">Sellers</div>
                        </div>
                        <div class="stat-box">
                            <div class="stat-value">{{ pendingSellersCount }}</div>
                            <div class="stat-label">Pending Sellers</div>
                        </div>
                        <div class="stat-box">
                            <div class="stat-value">{{ pendingProductsCount }}</div>
                            <div class="stat-label">Pending Products</div>
                        </div>
                    </div>

                    <!-- Second Row -->
                    <div class="stats-row">
                        <div class="stat-box">
                            <div class="stat-value">{{ skincareCount }}</div>
                            <div class="stat-label">Skincare Products</div>
                        </div>
                        <div class="stat-box">
                            <div class="stat-value">{{ haircareCount }}</div>
                            <div class="stat-label">Haircare Products</div>
                        </div>
                        <div class="stat-box">
                            <div class="stat-value">{{ makeupCount }}</div>
                            <div class="stat-label">Makeup Products</div>
                        </div>
                        <div class="stat-box">
                            <div class="stat-value">{{ ordersCount }}</div>
                            <div class="stat-label">Orders</div>
                        </div>
                    </div>

                    <!-- Third Row -->
                    <div class="stats-row">
                        <div class="stat-box">
                            <div class="stat-value">0</div>
                            <div class="stat-label">Order Details</div>
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
    data() {
        return {
            userCount: 0,
            approvedSellersCount: 0,
            pendingSellersCount: 0,
            pendingProductsCount: 0,
            skincareCount: 0,
            haircareCount: 0,
            makeupCount: 0,
            ordersCount: 0,
        };
    },
    methods: {
        async fetchStatistics() {
            try {
                const [users, products, sellers, orders] = await Promise.all([
                    axios.get('/admin/users/count'),
                    axios.get('/admin/products/count'),
                    axios.get('/admin/sellers/count'),
                    axios.get('/admin/orders/count')
                ]);

                this.userCount = users.data.count;
                this.skincareCount = products.data.skincare;
                this.haircareCount = products.data.haircare;
                this.makeupCount = products.data.makeup;
                this.pendingProductsCount = products.data.pending;
                this.approvedSellersCount = sellers.data.approved;
                this.pendingSellersCount = sellers.data.pending;
                this.ordersCount = orders.data.count;
            } catch (error) {
                console.error('Error fetching statistics:', error);
            }
        }
    },
    mounted() {
        this.fetchStatistics();
    }
};
</script>

<style scoped>
.main-stats-wrapper {
    border-radius: 20px;
    padding: 30px;
    margin: 20px auto;
    max-width: 1100px;
    position: absolute; 
    left: 20px;
    top: 70px;
}

.content-wrapper {
    max-width: 1200px;
    margin: 60 auto;
}

.stats-container {
    display: flex;
    flex-direction: column;
    gap: 20px;
    padding: 20px;
    font-family: 'Arial', sans-serif;
}

.stats-row {
    display: flex;
    justify-content: center;
    gap: 20px;
}

.stat-box {
    background-color: #dbbfff;
    border-radius: 12px;
    padding: 20px;
    min-width: 200px;
    text-align: center;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s ease;
}

.stat-box:hover {
    transform: translateY(-5px);
}

.stat-value {
    font-size: 32px;
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
}

.stat-label {
    font-size: 16px;
    color: #666;
}

/* Responsive Design */
@media (max-width: 1200px) {
    .stats-row {
        flex-wrap: wrap;
    }

    .stat-box {
        min-width: calc(50% - 20px);
    }
}

@media (max-width: 768px) {
    .stat-box {
        min-width: 100%;
    }
}

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

