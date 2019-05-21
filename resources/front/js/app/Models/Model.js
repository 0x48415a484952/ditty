import { Model } from 'sarala';

export default class BaseModel extends Model
{
    baseUrl () {
        return 'https://sarala-demo.app/api';
    }

    request (config) {
        return ;
    }
}
