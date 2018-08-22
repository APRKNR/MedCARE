<template>
    <div id="soi">
        <h3 class="text-center text-white pt-5">Source Of Information</h3>
        <div class="container">
            <div id="soi-row" class="row justify-content-center align-items-center">
                <div id="soi-column" class="col-md-6">
                    <div id="soi-box" class="col-md-12">
                        <form id="soi-form" class="form" action="" method="post">
                            <div class="form-group">
                                <label for="sourcedesc" class="text-info">Source Of Information:</label><br>
                                <input type="text" name="sourcedesc" id="sourcedesc" class="form-control" v-model="sourcedesc" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" @click="handleSubmit">Submit</button>
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
        name: 'soi',
        data() {
            return {
                sourcedesc: "",              
            }
        },
        methods: {
            handleSubmit(e) {

                e.preventDefault()
                let sourcedesc = this.sourcedesc
                let user = JSON.parse(localStorage.getItem('medcare.user'))
                axios.post('api/soi', {sourcedesc,user}).then(response => {
                        let status = response.data.status
                        
                });
            }
        }
    }
</script>