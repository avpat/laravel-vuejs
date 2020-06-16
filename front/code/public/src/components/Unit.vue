        <template>
            <div class="unit">
                <div class=" columns is-mobile">
                    <div class="column is-2 is-center">                  
                        <img class="is-horizontal-center" src="@/assets/marker.svg" alt="marker" width="32" />
                    </div>
                    <div class="column is-7 has-text-left"> 
                        <div>
                            <p class="is-size-6 font-medium is-text-darkgrey">{{unit.name}}</p>
                            <p class="is-size-7 is-text-darkgrey is-justified">{{ unit.address }} {{ unit.postcode }}</p>
                            <p class="is-size-10 is-right">{{ unit.charges.length == 0 ? "No charges yet" : unit.charges.length + " charge(s)" }} </p>
                        </div>  
                    </div>
                    <div class="column is-3 has-text-centered right-column">
                        <div>
                            <div class="is-uppercase is-size-7 textcolour" :class="unit.status" >{{unit.status}}</div>
                            <button
                                @click="toggleStatus()" class="button " :class="unit.status" >
                                {{ unit.status  == "available" ? "Start" : "Stop" }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        
        </template>

<script>
export default {
  name: 'Unit',
  props: ["unit"]
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

</style>
