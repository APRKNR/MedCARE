<template>
   <div>
        <main>
            <div id="headder" class="wrapper" v-if="isLoggedIn">
                Headder
            </div>  
            <div class="wrapper">  
                <nav id="sidebar" v-if="isLoggedIn">                
                    <ul class="list-unstyled components">                   
                        <li v-for="item in menuItems"
                          :key="item.title"
                          :to="item.path">
                            <router-link :to="{ name: item.path }" class="nav-link" v-if="!item.length">{{item.title}}</router-link> 
                            <a v-if="item.length" class="dropdown-toggle" href="#homeSubmenu" data-toggle="collapse" aria-expanded ="true">{{item.title}}</a>
                            <ul v-if="item.length" id="homeSubmenu" class="list-unstyled components">
                              <li v-for="subitem in item">
                                <router-link :to="{ name: subitem.path }" class="nav-link">{{subitem.title}}</router-link> 
                              </li>
                            </ul>                    
                        </li>
                    </ul>
                </nav>       
                <div id="content">                  
                    <div class="container-fluid">
                       <router-view @loggedIn="change"></router-view>
                    </div>                   
                </div>
            </div> 
            <div id="footer" class="wrapper">
                Headder
            </div>           
        </main>
    </div>
</template>

<script>
    export default {
        name: 'app',
        data() {
            return {
                name: null,
                user_type: 0,
                isLoggedIn: localStorage.getItem('medcare.jwt') != null,
                sidebar: false,
                menuItems: [
                       [{title: 'Source Of Information', path: 'soi', icon: 'home' },
                            {title: 'Create', path: 'soi', icon: 'home' },
                            {title: 'List', path: 'soi', icon: 'home' }],
                      { title: 'Sign Up', path: '/signup', icon: 'face' },
                      { title: 'Sign In', path: '/signin', icon: 'lock_open' }
                    ],
            }
        },
        mounted() {
            this.setDefaults()
            //axios.get("api/products/").then(response => this.products = response.data)
        },
        created: function () {
            this.$router.push({name:'login'})
        } ,
        methods : {
            setDefaults() {
                if (this.isLoggedIn) {
                    let user = JSON.parse(localStorage.getItem('medcare.user'))
                    this.name = user.name
                    this.user_type = user.is_admin
                }
            },
            change() {
                this.isLoggedIn = localStorage.getItem('medcare.jwt') != null
                this.setDefaults()
            },
            logout(){
                localStorage.removeItem('medcare.jwt')
                localStorage.removeItem('medcare.user')
                this.change()
                this.$router.push('/')
            }
        }
        
    }
</script>

<style scoped>
    
    .wrapper {
        display: flex;
        align-items: stretch;
    }
    #content {
        width: 100%;
        padding: 20px;
        min-height: 100vh;
        transition: all 0.3s;
    }
    #headder {
        display: flex;
        width: 100%;
        background: #7386D5;
        color: #fff;
        transition: all 0.3s;
        height:75px;
        align-items: start;
    }
    #footer {
        display: flex;
        width: 100%;
        background: #7386D5;
        color: #fff;
        transition: all 0.3s;
        height:15px;
        align-items: end;
    }
    #sidebar {
        min-width: 250px;
        max-width: 250px;
        background: #7386D5;
        color: #fff;
        transition: all 0.3s;
    }
    #sidebar.active {
        min-width: 80px;
        max-width: 80px;
        text-align: center;
    }

    /* Toggling the sidebar header content, hide the big heading [h3] and showing the small heading [strong] and vice versa*/

    #sidebar ul li a {
        text-align: left;
        color: #fff;
    }

    #sidebar.active ul li a {
        padding: 20px 10px;
        text-align: center;
        font-size: 0.85em;
    }

    #sidebar.active ul li a i {
        margin-right:  0;
        display: block;
        font-size: 1.8em;
        margin-bottom: 5px;
    }

    /* Same dropdown links padding*/
    #sidebar.active ul ul a {
        padding: 10px !important;
    }

    /* Changing the arrow position to bottom center position, 
       translateX(50%) works with right: 50% 
       to accurately  center the arrow */
    #sidebar.active .dropdown-toggle::after {
        top: auto;
        bottom: 10px;
        right: 50%;
        -webkit-transform: translateX(50%);
        -ms-transform: translateX(50%);
        transform: translateX(50%);
    }
    @media (max-width: 768px) {
        /* 80px and its content aligned to centre. Pushing it off the screen with the
           negative left margin
        */
        #sidebar.active {
            min-width: 80px;
            max-width: 80px;
            text-align: center;
            margin-left: -80px !important;
        }


        /* Reappearing the sidebar on toggle button click */
        #sidebar {
            margin-left: 0; 
        }


        /* Toggling the sidebar header content, 
           hide the big heading [h3] and showing the small heading [strong] and vice versa
        */
        #sidebar .sidebar-header strong {
            display: none;
        }
        #sidebar.active .sidebar-header h3 {
            display: none;
        }
        #sidebar.active .sidebar-header strong {
            display: block;
        }

        /* Downsize the navigation links font size */
        #sidebar.active ul li a {
            padding: 20px 10px;
            font-size: 0.85em;
        }

        #sidebar.active ul li a i {
            margin-right:  0;
            display: block;
            font-size: 1.8em;
            margin-bottom: 5px;
        }

        /* Adjust the dropdown links padding*/
        #sidebar.active ul ul a {
            padding: 10px !important;
        }

        /* Changing the arrow position to bottom center position, 
          translateX(50%) works with right: 50% 
          to accurately  center the arrow */
        .dropdown-toggle::after {
            top: auto;
            bottom: 10px;
            right: 50%;
            -webkit-transform: translateX(50%);
            -ms-transform: translateX(50%);
            transform: translateX(50%);
        }
    }
    </style>