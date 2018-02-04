<?php

/*
 * This file is part of the Sonata Project package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\DoctrineORMAdminBundle\Tests\Filter;

use PHPUnit\Framework\TestCase;
use Sonata\CoreBundle\Form\Type\DateTimeRangeType;
use Sonata\DoctrineORMAdminBundle\Datagrid\ProxyQuery;
use Sonata\DoctrineORMAdminBundle\Filter\DateTimeRangeFilter;

/**
 * @author Marko Kunic <kunicmarko20@gmail.com>
 */
class DateTimeRangeFilterTest extends TestCase
{
    public function testEmpty()
    {
        $filter = new DateTimeRangeFilter();
        $filter->initialize('field_name', ['field_options' => ['class' => 'FooBar']]);

        $builder = new ProxyQuery(new QueryBuilder());

        $filter->filter($builder, 'alias', 'field', null);
        $filter->filter($builder, 'alias', 'field', '');

        $this->assertEquals([], $builder->query);
        $this->assertFalse($filter->isActive());
    }

    public function testGetType()
    {
        $this->assertSame(DateTimeRangeType::class, (new DateTimeRangeFilter())->getFieldType());
    }
}
