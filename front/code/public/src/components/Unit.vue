<template>
    <div :key="unit.id" class="unit">
        <div class=" columns is-mobile">
            <div class="column is-2 is-center">                  
                <img class="is-horizontal-center" src="@/assets/marker.svg" alt="marker" width="32" />
            </div>
            <div class="column is-7 has-text-left"> 
                <div>
                    <p class="is-size-6 font-medium is-text-darkgrey">{{unit.name}}</p>
                    <p class="is-size-7 is-text-darkgrey is-justified">{{ unit.address }} {{ unit.postcode }}</p>
                    <p class="is-size-10 is-right">

                        <span v-if="Object.keys(unit.charges).length > 1">
                            {{Object.keys(unit.charges).length}}  charge(s) </span>
                        <span v-else-if="typeof(unit.charges) != 'undefined' && Object.keys(unit.charges).length == 1" >1 charge </span>
                        <span v-else>No charges yet</span>
                    </p>
                </div>  
            </div>
            <div class="column is-3 has-text-centered right-column">
                <div>
                    <div class="is-uppercase is-size-7 textcolour" :class="[ { 'has-text-primary': available, 'has-text-orange': charging }]" >
                        {{ status }}</div>
                    <button @click="toggleCharging()" :class="[ 'button', { 'is-primary': available, 'is-orange': charging }]" >
                        {{ available ? "Start" : "Stop" }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>


<script>

    import axios from 'axios'

    var moment = require('moment')
    export default {
        name: 'Unit',
        props: {
            unit: Object
        },
        data() {
            return {
                status: this.unit.status,
                charges: this.unit.charges,
                charge: this.unit.charges[0] || {}
            };
        },
        computed: {
            available() {
                return this.status === "available";
            },
            charging() {
                return this.status === "charging";
            }
        },
        methods: {
            toggleCharging() {
                
                if (this.available) {
                    this.startCharging();
                } else if (this.charging) {
                    this.isCharging(this.unit.id)
                }
            },
            isCharging() {

                axios.get(`/api/units/${this.unit.id}`)            
                .then(response => {
                        let id = null; 
                        response.data.data.charges.forEach(element => {
                            if(element.end == null) {
                                id = element.id;
                            }
                        });
                    return id; 
                })
                .then(id => {
                    this.stopCharging(id)
                })
                .catch(e => {
                    this.errors.push(e)
                })

            },
            startCharging() {
                axios.post(`/api/units/${this.unit.id}`, {start : moment().format("YYYY-MM-DD HH:mm:ss")})
                .then(({ data }) => {
                    this.status = "charging";
                    this.charge = data;
                    this.charges.push(data);
                });
            },
            stopCharging(changeId) {

                axios
                    .post(`/api/units/${this.unit.id}/charges/${changeId}`, {end : moment().format("YYYY-MM-DD HH:mm:ss"),  _method: 'patch'})
                    .then(({ data }) => {
                        this.status = "available";
                        console.log(data)
                    });
            }
        }
    }
</script>

<style lang="scss" scoped>
    .unit {
        padding: 15px 0;
        border-bottom: 1px solid rgb(169,169,169);
    }
    .button {
        border-radius: 0;
        font-weight: 600;
        padding: 0;
        min-width: 85px;
        min-width: 66px;
    }
    .textcolour.available {
        color: rgb(60,179,113);
        background-color: inherit;
    }
    .textcolour.charging {
        color: rgb(255,127,80);
        background-color: inherit;
    }
    .available {
        background-color: rgb(60,179,113);
        border-color: transparent;
        color: #fff;
    }
    .charging {
        background-color: rgb(255,127,80);
        border-color: transparent;
        border-radius: 0;
        color: #fff;
    }

    .right-column {
        display: flex;
        flex-direction: column;
        font-weight: 500;
    }
    .is-size-10 {
        text-align: right;
        font-size: 0.8em;
    }
    .font-medium {
        font-weight: 600;
    }
    .is-horizontal-center {
    justify-content: center;
    }
    .is-text-darkgrey {
        color: rgb(15, 15, 15);
    }
    .is-orange {
        color: #ffffff;
        background-color: #f47e1d;
    }
</style>
