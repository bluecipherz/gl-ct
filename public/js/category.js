/**
 * Created by bazi on 16-Aug-15.
 */

/**
 * The main category array.
 * All category list is fetched from the server and is stored in this array.
 */
var cats;

function setCats(_cats) {
    cats = _cats;
}

function getCats(level) {
    if(level != undefined) {
        if(level == -1) {
            return [{id: -1,name: 'No parent'}];
        }
        // cats.filter : find an array by its key and value
        return cats.filter(function(cat) {
            return cat.depth == level;
        });
    }
}

var Category = function(id) {
    this.cat = cats.filter(function (cat) {
        return cat.id == id;
    })[0];
    this.find = function(i) {
        this.cat = this.cats.filter(function(cat) {
            return cat.id == i;
        })[0];
        return this;
    };
    this.parent = function() {
        if(this.cat.parent_id != undefined) {
            return new Category(this.cat.parent_id);
        }
    };
    this.children = function() {
        if(this.cat.depth < 2) {
            var cat_id = this.cat.id;
            return cats.filter(function(cat) {
                return cat.parent_id == cat_id;
            });
        }
    };
    this.isDescendantOf = function(i) {
        var ancestor = new Category(i);
        if(this.cat.depth > 1) return this.parent().parent().cat.id == ancestor.cat.id;
        //return false; // no need i guess
    };
    this.get = function() {
        return this.cat;
    };
};