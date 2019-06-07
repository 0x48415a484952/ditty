export default class  HttpRequest {
    constructor(url, method="get", data = {}, headers = {}) {
        this.url = url;
        this.method = method;
        this.data = data;
        this.headers = headers;
    }

    send (resolve = undefined, reject = undefined) {
        $.ajax({
            url: this.url,
            data: this.data,
            method: this.method,
            headers: this.headers,
            error: () => {
                return reject ? reject() : undefined;
            },
            success: (result) => {
                return resolve ? resolve(result) : undefined;
            }
        });
    }
}
