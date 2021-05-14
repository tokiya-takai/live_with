<template>
    <form :action="action" method="post" enctype="multipart/form-data" class="post-form">
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
                <div class="post-purchase-date">
                    <label class="post-form-label">購入日</label>
                    <input type="date" name="purchase_date" :value="setValue('purchase_date')">
                </div>
            </div>
            <div class="form-group">
                <div class="post-title">
                    <label class="post-form-label">ブランド名</label>
                    <input type="text" name="title" :value="setValue('title')">
                </div>
                <strong class="error" v-for="value in errors.title">{{ value }}</strong>
            </div>
            <div class="form-group">
                <div class="post-details">
                    <label class="post-form-label">詳細情報</label>
                    <textarea name="details" maxlength="500" :value="setValue('details')"></textarea>
                </div>
                <strong class="error" v-for="value in errors.details">{{ value }}</strong>
            </div>
            <div class="form-group">
                <div class="post-maintenance">
                    <label class="post-form-label">メンテナンス内容</label>
                    <textarea name="maintenance" maxlength="1000" :value="setValue('maintenance')"></textarea>
                </div>
                <strong class="error" v-for="value in errors.maintenance">{{ value }}</strong>
            </div>
            <div class="form-group">
                <div class="post-remarks">
                    <label class="post-form-label">備考</label>
                    <textarea name="remarks" maxlength="1000" :value="setValue('remarks')"></textarea>
                </div>
                <strong class="error" v-for="value in errors.remarks">{{ value }}</strong>
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
                url:"",
                action: "/posts/update/" + this.item.id,
            }
        },
        props:  {
            csrf: {
                type: String,
                required: true,
            },
            item: Array,
            old: Array,
            errors: Array,
        },
        created() {
            if(this.item.file_path) {
                this.url = this.item.file_path;
                return;
            }
        },
        methods:{
            fileSelected(){
                const file = this.$refs.preview.files[0];
                this.url = URL.createObjectURL(file)
            },
            setValue(key) {
                switch (key) {
                    case "purchase_date":
                        if(this.old.purchase_date){
                            return this.old.purchase_date;
                        } else {
                            return this.item.purchase_date;
                        }
                        break;
                    case "title":
                        if(this.old.title){
                            return this.old.title;
                        } else {
                            return this.item.title;
                        }
                        break;
                    case "details":
                        if(this.old.details){
                            return this.old.details;
                        } else {
                            return this.item.details;
                        }
                        break;
                    case "maintenance":
                        if(this.old.maintenance){
                            return this.old.maintenance;
                        } else {
                            return this.item.maintenance;
                        }
                        break;
                    case "remarks":
                        if(this.old.remarks){
                            return this.old.remarks;
                        } else {
                            return this.item.remarks;
                        }
                        break;
                    default:
                        break;
                }
            },
        },
    }
</script>