<template>
    <form action="/posts/create" method="post" enctype="multipart/form-data" class="post-form">
        <input type="hidden" name="_token" v-bind:value="csrf">
        <div class="form-header">
            <div class="form-background-img"></div>
            <div class="file-area">
                <div v-if="url" class="upload-file">
                    <img :src="url">
                </div>
                <div v-else class="upload-file">
                    <div><span>NO IMAGE</span></div>
                </div>
            </div>
            <div class="upload-btn-area">
                <input type="file" name="file" accept="image/*" ref="preview" v-on:change="fileSelected" class="upload-btn">
            </div>
        </div>
        <div class="form-body">
            <div class="form-group">
                <div class="post-title">
                    <input type="text" name="title" placeholder="Brand name, title, etc." maxlength="50">
                </div>
            </div>
            <div class="form-group">
                <div class="post-details">
                    <textarea name="details" placeholder="Enter details" maxlength="500"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="post-purchase-date">
                    <input type="date" name="purchase_date">
                </div>
            </div>
            <div class="form-group">
                <div class="post-maintenance">
                    <textarea name="maintenance" placeholder="" maxlength="1000"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="post-remarks">
                    <textarea name="remarks" placeholder="" maxlength="1000"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="submit-btn">
                    <input type="submit" value="SEND">
                </div>
            </div>
        </div>
    </form>
</template>

<script>
    export default {
        data() {
            return {
                url:""
            }
        },
        methods:{
            fileSelected(){
                const file = this.$refs.preview.files[0];
                this.url = URL.createObjectURL(file)
            }
        },
        props:  {
            csrf: {
                type: String,
                required: true,
            }
        },
    }
</script>