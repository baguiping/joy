package com.thn.netty.chat.primitive;

import org.apache.commons.lang.builder.ToStringBuilder;
import org.apache.commons.lang.builder.ToStringStyle;

/**
 * Typed name to identify a user. This is published to other users.
 * @author Thierry Herrmann
 */
public class DeviceSn {
    private static final int MAX_LENGTH = 20;
    private final String mName;

    public DeviceSn(String aName) {
        if (aName.length() > MAX_LENGTH) {
            throw new IllegalArgumentException("name too long. Max " + MAX_LENGTH + " chars: " + aName);
        }
        mName = aName;
    }

    public String getSn() {
        return mName;
    }

    @Override
    public int hashCode() {
        final int prime = 31;
        int result = 1;
        result = prime * result + ((mName == null) ? 0 : mName.hashCode());
        return result;
    }

    @Override
    public boolean equals(Object aObject) {
        if (this == aObject)
            return true;
        if (aObject == null)
            return false;
        if (getClass() != aObject.getClass())
            return false;
        DeviceSn other = (DeviceSn) aObject;
        if (mName == null) {
            if (other.mName != null)
                return false;
        } else if (!mName.equals(other.mName))
            return false;
        return true;
    }

    /** {@inheritDoc} */
    @Override
    public String toString()
    {
        return new ToStringBuilder(this, ToStringStyle.SHORT_PREFIX_STYLE)
        .append("mName", mName)
        .toString();
    }
    
}

