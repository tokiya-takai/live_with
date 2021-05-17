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
                    <input type="date" name="purchase_date" v-model="purchase_date">
                </div>
            </div>
            <div class="form-group">
                <div class="post-title">
                    <label class="post-form-label">ブランド名</label>
                    <input type="text" name="title" v-model="title" maxlength="50">
                    <p>{{ title.length }}/50</p>
                </div>
                <strong class="error" v-for="value in errors.title">{{ value }}</strong>
            </div>
            <div class="form-group">
                <div class="post-details">
                    <label class="post-form-label">詳細情報</label>
                    <textarea name="details" maxlength="500" v-model="details"></textarea>
                    <p>{{ details.length }}/500</p>
                </div>
                <strong class="error" v-for="value in errors.details">{{ value }}</strong>
            </div>
            <div class="form-group">
                <div class="post-maintenance">
                    <label class="post-form-label">メンテナンス内容</label>
                    <textarea name="maintenance" maxlength="1000" v-model="maintenance"></textarea>
                    <p>{{ maintenance.length }}/1000</p>
                </div>
                <strong class="error" v-for="value in errors.maintenance">{{ value }}</strong>
            </div>
            <div class="form-group">
                <div class="post-remarks">
                    <label class="post-form-label">備考</label>
                    <textarea name="remarks" maxlength="1000" v-model="remarks"></textarea>
                    <p>{{ remarks.length }}/1000</p>
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
                purchase_date: "",
                title: "",
                details: "",
                maintenance: "",
                remarks: "",
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
        mounted() {
            if(this.old.purchase_date){
                this.purchase_date = this.old.purchase_date;
            } else {
                if(this.item.purchase_date != null){
                    this.purchase_date = this.item.purchase_date;
                }else{
                    this.purchase_date = "";
                }
            }

            if(this.old.title){
                this.title = this.old.title;
            } else {
                this.title = this.item.title;
            }

            if(this.old.details){
                this.details = this.old.details;
            } else {
                if(this.item.details != null){
                    this.details = this.item.details;
                }else{
                    this.details = "";
                }
            }

            if(this.old.maintenance){
                this.maintenance = this.old.maintenance;
            } else {
                if(this.item.maintenance != null){
                    this.maintenance = this.item.maintenance;
                }else{
                    this.maintenance = "";
                }
            }

            if(this.old.remarks){
                this.remarks = this.old.remarks;
            } else {
                if(this.item.remarks != null){
                    this.remarks = this.item.remarks;
                }else{
                    this.remarks = "";
                }
            }
        },
        methods:{
            fileSelected(){
                const file = this.$refs.preview.files[0];
                this.url = URL.createObjectURL(file)
            },
        },
    }
</script>