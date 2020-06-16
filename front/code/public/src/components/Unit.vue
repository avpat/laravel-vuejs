        <template>
        <div class="unit">
            <div class="level">
                <p class="level-item has-text-centered">
                    <a class="link is-info">{{unit.name}}</a>
                </p>
                <p class="level-item has-text-centered">
                    <a class="link is-info">{{unit.address}}</a>
                </p>
                <p class="level-item has-text-centered">
                    <img src="https://bulma.io/images/bulma-type.png" alt="" style="height: 30px;">
                </p>
                <p class="level-item has-text-centered">
                    <a class="link is-info">{{unit.status}}</a>
                </p>
            </div>
        </div>
        </template>

<script>
export default {
  name: 'Unit',
  props: ["unit"]
}
</script>

