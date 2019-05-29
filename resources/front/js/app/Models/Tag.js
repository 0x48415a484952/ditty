import Model from './Model';

export default class Tag extends Model {
    resourceName () {
        return 'tags';
    }

    fields () {
        return ['name'];
    }
}
