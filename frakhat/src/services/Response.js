export const FAILED_REQUEST = '402';

class Response {

    constructor(initial_res, callback = () => { }) {
        const { data, status } = initial_res;

        //change this data.status -> status
        this.status = data.hasOwnProperty('status') ? data.status : status;
        this.message = data?.message;
        this.data = initial_res.data;

        // 
        callback(data);
    }

    hasFailed = function () {
        return this.status === FAILED_REQUEST
    }
}
export default Response