    <template>
        <div class="sidenav">
            <div class="containeer">
                <Link href="/admindashboard">Dashboard</Link>
                <Link href="/users">Users</Link>
                <Link href="/sellers">Pending Sellers</Link>
                <Link href="/approvedsellers">Sellers List</Link>

                <button class="dropdown-btn">
                    Skincare Products
                    <img class="chevron" src="/adminImg/Chevron-right.png" alt="Chevron" />
                </button>
                <div class="dropdown-container">
                    <Link href="/toners">Toners</Link>
                    <Link href="/moisturizer">Moisturizer</Link>
                    <Link href="/cream">Cream</Link>
                    <Link href="/sunscreen">Sunscreen</Link>
                </div>

                <button class="dropdown-btn">Hair Care Products
                    <img class="chevron" src="/adminImg/Chevron-right.png" alt="Chevron" />
                </button>
                <div class="dropdown-container">
                    <Link href="/shampoo">Shampoo</Link>
                    <Link href="/conditioner">Conditioner</Link>
                    <Link href="/dry-shampoo">Dry Shampoo</Link>
                    <Link href="/hairspray">Hairspray</Link>
                </div>

                <button class="dropdown-btn">Makeup Products
                    <img class="chevron" src="/adminImg/Chevron-right.png" alt="Chevron" />
                </button>
                <div class="dropdown-container">
                    <Link href="/foundations">Foundations</Link>
                    <Link href="/concealers">Concealers</Link>
                    <Link href="/blushes">Blushes</Link>
                    <Link href="/lip-tints">Lip Tints</Link>
                </div>

                <Link href="/add-products">Add Products</Link>
                <Link href="/orders">Orders</Link>
                <Link href="/order-details">Order Details</Link>
            </div>
        </div>
    </template>

    <script>
    import { Link } from '@inertiajs/vue3';
    import {defineComponent} from "vue";
    export default defineComponent({
        components: {Link},
        mounted() {
            const dropdownButtons = document.getElementsByClassName("dropdown-btn");

            for (let i = 0; i < dropdownButtons.length; i++) {
                dropdownButtons[i].addEventListener("click", function () {
                    this.classList.toggle("active");
                    const dropdownContent = this.nextElementSibling;
                    const chevron = this.querySelector(".chevron");

                    if (dropdownContent.style.display === "block") {
                        dropdownContent.style.display = "none";
                        chevron.style.transform = "rotate(0deg)";
                    } else {
                        dropdownContent.style.display = "block";
                        chevron.style.transform = "rotate(90deg)";
                    }
                });
            }
        },
    });
    </script>

    <style scoped>

    .sidenav a[href="./index.html"] {
        background-color: #C987FF;
    }

    .sidenav a:not([href="./index.html"]):hover,
    .dropdown-btn:hover {
        background-color: #C987FF;
    }


    .chevron {
        width: 25px;
        height: 20px;
        transition: transform 0.3s ease;
        vertical-align: middle;
        margin-left: 5px;
    }

    .sidenav {
        height: 730px;
        width: 259px;
        position: absolute;
        z-index: 1;
        top: 59px;
        left: -20px;
        background-color: #DBBFFF;
        overflow-x: hidden;
        padding-top: 40px;
    }

    .containeer {
        position: absolute;
        left: 21px;
    }

    .sidenav a, .dropdown-btn {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 20px;
        color: #000000;
        display: block;
        border: none;
        background: none;
        width: 100%;
        text-align: left;
        cursor: pointer;
        outline: none;
        font-family: Arial;
    }


    .sidenav a,
    .dropdown-btn {
        width: 230px;
    }

    .sidenav a:hover,
    .dropdown-btn:hover {
        background-color: #C987FF;
    }

    .main {
        margin-left: 200px;
        font-size: 20px;
        padding: 0px 10px;
    }
    .active {
        background-color: #C987FF;
    }


    .dropdown-container {
        display: none;
        background-color: #D6A3FF;
        padding-left: 8px;
    }

    .fa-caret-down {
        float: right;
        padding-right: 8px;
    }

    @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
    }



    </style>
