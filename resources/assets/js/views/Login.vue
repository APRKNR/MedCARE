<template>
    <div id="login">
        <h3 class="text-center text-white pt-5">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control" v-model="name">
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-info">E-Mail Address</label><br>
                                <input id="email" type="email" class="form-control" v-model="email" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control" v-model="password" required>
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                
                                <button type="submit" class="btn btn-primary" @click="handleSubmit">
                                    Login
                                </button>
                                <button type="submit" class="btn btn-primary" @click="handleRegister">
                                    Register
                                </button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </template>

     <script>
        export default {
            name: 'login',
            data() {
                return {
                    name: "",
                    email: "",
                    password: ""
                }
            },
            methods: {
                handleSubmit(e) {

                    e.preventDefault()
                    if (this.password.length > 0) {
                        let email = this.email
                        let password = this.password

                        axios.post('api/login', {email, password}).then(response => {
                            let user = response.data.user
                            let is_admin = user.is_admin
                            
                            localStorage.setItem('medcare.user', JSON.stringify(user))
                            localStorage.setItem('medcare.jwt', response.data.token)

                            if (localStorage.getItem('medcare.jwt') != null) {
                                this.$emit('loggedIn')
                                if (this.$route.params.nextUrl != null) {
                                    this.$router.push(this.$route.params.nextUrl)
                                } else {
                                    //this.$router.push((is_admin == 1 ? 'admin' : 'home'))
                                    this.$router.push({name:'home'})
                                }
                            }
                        });
                    }
                },
            
                handleRegister(e) {

                    e.preventDefault()
                    if (this.password.length > 0) {
                        let email = this.email
                        let password = this.password
                        let name = this.name
                        let c_password = this.password
                        axios.post('api/register', {name,email, password,c_password}).then(response => {
                            let user = response.data.user
                            let is_admin = user.is_admin

                            localStorage.setItem('medcare.user', JSON.stringify(user))
                            localStorage.setItem('medcare.jwt', response.data.token)

                            if (localStorage.getItem('medcare.jwt') != null) {
                                this.$emit('loggedIn')
                                if (this.$route.params.nextUrl != null) {
                                    this.$router.push(this.$route.params.nextUrl)
                                } else {
                                    this.$router.push((is_admin == 1 ? 'admin' : 'dashboard'))
                                }
                            }
                        });
                    }
                }
            }
        }
    </script>