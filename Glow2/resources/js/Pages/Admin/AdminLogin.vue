<template>
    <div class="main-container-admin">

        <div class="gradient"></div>
        <div class="rectangle"></div>

        <div class="admin-container">
        <div class="header-admin">
        <div class="logo-container">
            <img src="/assets/img/logo.png" alt="Logo" class="logo" />
        </div>
        <span class="glow-and-grace">GLOW AND GRACE</span>
        <span class="administration">ADMINISTRATION</span>
        </div>


        <div class="maluoykawauth-admin">
            <div class="form-container">
                <span class="welcome-message">Welcome Back!</span>

                <!-- Email Input -->
                <div class="input-container">
                    <img src="/assets/img/email.png" alt="Email" class="input-icon" />
                    <input
                        class="input-field"
                        type="email"
                        placeholder="Email"
                        v-model="form.email"
                        required
                        autofocus
                    />
                    <span class="error-message" v-if="form.errors.email">{{ form.errors.email }}</span>
                </div>

                <!-- Password Input -->
                <div class="input-container">
                    <img src="/assets/img/password.png" alt="Password" class="input-icon" />
                    <input
                        class="input-field"
                        type="password"
                        placeholder="Password"
                        v-model="form.password"
                        required
                    />
                    <span class="error-message" v-if="form.errors.password">{{ form.errors.password }}</span>
                </div>

                <!-- Login Button -->
                <button class="login-container" @click.prevent="submit">
                    <span>Log In</span>
                </button>
            </div>
            </div>
        </div>
    </div>
</template>

<script>
import '/resources/css/home.css';
import '/resources/css/login.css';
import { defineComponent } from 'vue';
import HeaderComponent from '@/Components/UI/HeaderComponent.vue';
import { Link, useForm } from '@inertiajs/vue3';

export default defineComponent({
    name: 'loginpage',
    components: {
        Link,
        HeaderComponent
    },
    setup() {
        const form = useForm({
            email: '',
            password: '',
            remember: false,
        });

        const submit = () => {
            form.post(route('admin.login.store'), {
                onSuccess: () => form.reset('password'),
            });
        };

        return {
            form,
            submit
        };
    }
});
</script>


<style scoped>

.admin-container{
    position: absolute;
    left: -10px;
}
.main-container-admin{
  overflow: hidden;
  position: relative;
  width: 1349px;
  height: 680px;
  margin: 0 0 0 0px;
  font-size: 0px;
  overflow: hidden;
}

.header-admin{
    position: absolute;
    top: 90px;
    left: 450px;
}


.maluoykawauth-admin{
    position:absolute;
    left: 70px;
    top: 80px;
}

.administration {
    display: flex;
    align-items: flex-start;
    justify-content: center;
    position: absolute;
    width: 262px;
    height: 29px;
    top: 87px;
    left: 131px;
    color: #731b81;
    font-family: Katibeh, var(--default-font-family);
    font-size: 40px;
    font-weight: 400;
    line-height: 29px;
    text-align: center;
    white-space: nowrap;
}




</style>
