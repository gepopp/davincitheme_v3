window.projectFilterbar = (url, types, location) => {
    return {
        types: types,
        locations: location,
        baseurl: url,
        toggleType(id) {

            var i = this.types.indexOf(id);
            if (i === -1)
                this.types.push(id);
            else
                this.types.splice(i, 1);
        },
        filter() {

            var url = this.baseurl;
            url += '?type=';
            url += this.types.join(',');
            url += '&location=';
            url += this.locations;

            window.location.href = url;
        },
        reset(){
            window.location.href = this.baseurl;
        }

    }
}